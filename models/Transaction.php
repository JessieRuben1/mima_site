<?php
class Transaction {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO transactions (user_id, product_id, quantity, total_amount, shipping_address, status) 
                VALUES (:user_id, :product_id, :quantity, :total_amount, :shipping_address, :status)";
        
        $params = [
            ':user_id' => $data['user_id'],
            ':product_id' => $data['product_id'],
            ':quantity' => $data['quantity'],
            ':total_amount' => $data['total_amount'],
            ':shipping_address' => $data['shipping_address'],
            ':status' => 'pending'
        ];

        return $this->db->query($sql, $params);
    }

    public function update($id, $data) {
        $sql = "UPDATE transactions 
                SET status = :status, 
                    updated_at = CURRENT_TIMESTAMP 
                WHERE id = :id AND user_id = :user_id";
        
        $params = [
            ':id' => $id,
            ':user_id' => $data['user_id'],
            ':status' => $data['status']
        ];

        return $this->db->query($sql, $params);
    }

    public function cancel($id, $userId) {
        $sql = "UPDATE transactions 
                SET status = 'cancelled', 
                    updated_at = CURRENT_TIMESTAMP 
                WHERE id = :id AND user_id = :user_id";
        
        $params = [':id' => $id, ':user_id' => $userId];
        return $this->db->query($sql, $params);
    }

    public function getById($id) {
        $sql = "SELECT t.*, p.name as product_name, p.price, p.image, u.name as seller_name 
                FROM transactions t 
                JOIN products p ON t.product_id = p.id 
                JOIN users u ON p.user_id = u.id 
                WHERE t.id = :id";
        
        $params = [':id' => $id];
        return $this->db->query($sql, $params)->fetch();
    }

    public function getByUserId($userId, $params = []) {
        $conditions = ['t.user_id = :user_id'];
        $queryParams = [':user_id' => $userId];
        
        if (!empty($params['status']) && $params['status'] !== 'all') {
            $conditions[] = 't.status = :status';
            $queryParams[':status'] = $params['status'];
        }

        $whereClause = implode(' AND ', $conditions);
        $offset = ($params['page'] - 1) * $params['per_page'];
        
        // Get total count
        $countSql = "SELECT COUNT(*) as total 
                     FROM transactions t 
                     WHERE $whereClause";
        
        $total = $this->db->query($countSql, $queryParams)->fetch()['total'];
        
        // Get paginated results
        $queryParams[':limit'] = $params['per_page'];
        $queryParams[':offset'] = $offset;
        
        $sql = "SELECT t.*, p.name as product_name, p.price, p.image, u.name as seller_name 
                FROM transactions t 
                JOIN products p ON t.product_id = p.id 
                JOIN users u ON p.user_id = u.id 
                WHERE $whereClause 
                ORDER BY t.created_at DESC 
                LIMIT :limit OFFSET :offset";
        
        $items = $this->db->query($sql, $queryParams)->fetchAll();
        
        return [
            'items' => $items,
            'total' => $total
        ];
    }

    public function getSummary($userId) {
        $sql = "SELECT 
                    COUNT(*) as total_transactions,
                    SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed_transactions,
                    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending_transactions,
                    SUM(CASE WHEN status = 'failed' THEN 1 ELSE 0 END) as failed_transactions,
                    SUM(CASE WHEN status = 'completed' THEN total_amount ELSE 0 END) as total_spent,
                    AVG(CASE WHEN status = 'completed' THEN total_amount ELSE NULL END) as average_transaction
                FROM transactions 
                WHERE user_id = :user_id";
        
        $params = [':user_id' => $userId];
        return $this->db->query($sql, $params)->fetch();
    }
} 