<?php
class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO products (user_id, name, description, price, category_id, condition, image, status) 
                VALUES (:user_id, :name, :description, :price, :category_id, :condition, :image, :status)";
        
        $params = [
            ':user_id' => $data['user_id'],
            ':name' => $data['name'],
            ':description' => $data['description'],
            ':price' => $data['price'],
            ':category_id' => $data['category_id'],
            ':condition' => $data['condition'],
            ':image' => $data['image'],
            ':status' => 'active'
        ];

        return $this->db->query($sql, $params);
    }

    public function update($id, $data) {
        $sql = "UPDATE products 
                SET name = :name, 
                    description = :description, 
                    price = :price, 
                    category_id = :category_id, 
                    condition = :condition, 
                    image = :image 
                WHERE id = :id AND user_id = :user_id";
        
        $params = [
            ':id' => $id,
            ':user_id' => $data['user_id'],
            ':name' => $data['name'],
            ':description' => $data['description'],
            ':price' => $data['price'],
            ':category_id' => $data['category_id'],
            ':condition' => $data['condition'],
            ':image' => $data['image']
        ];

        return $this->db->query($sql, $params);
    }

    public function delete($id, $userId) {
        $sql = "DELETE FROM products WHERE id = :id AND user_id = :user_id";
        $params = [':id' => $id, ':user_id' => $userId];
        return $this->db->query($sql, $params);
    }

    public function getById($id) {
        $sql = "SELECT p.*, c.name as category_name, u.name as seller_name, u.location as seller_location 
                FROM products p 
                JOIN categories c ON p.category_id = c.id 
                JOIN users u ON p.user_id = u.id 
                WHERE p.id = :id";
        $params = [':id' => $id];
        return $this->db->query($sql, $params)->fetch();
    }

    public function getByUserId($userId, $page = 1, $perPage = 10) {
        $offset = ($page - 1) * $perPage;
        
        $sql = "SELECT p.*, c.name as category_name 
                FROM products p 
                JOIN categories c ON p.category_id = c.id 
                WHERE p.user_id = :user_id 
                ORDER BY p.created_at DESC 
                LIMIT :limit OFFSET :offset";
        
        $params = [
            ':user_id' => $userId,
            ':limit' => $perPage,
            ':offset' => $offset
        ];

        return $this->db->query($sql, $params)->fetchAll();
    }

    public function search($params) {
        $conditions = [];
        $queryParams = [];
        
        if (!empty($params['query'])) {
            $conditions[] = "(p.name LIKE :query OR p.description LIKE :query)";
            $queryParams[':query'] = "%{$params['query']}%";
        }
        
        if (!empty($params['category'])) {
            $conditions[] = "c.id = :category_id";
            $queryParams[':category_id'] = $params['category'];
        }
        
        if (!empty($params['price_min'])) {
            $conditions[] = "p.price >= :price_min";
            $queryParams[':price_min'] = $params['price_min'];
        }
        
        if (!empty($params['price_max'])) {
            $conditions[] = "p.price <= :price_max";
            $queryParams[':price_max'] = $params['price_max'];
        }
        
        if (!empty($params['location'])) {
            $conditions[] = "u.location LIKE :location";
            $queryParams[':location'] = "%{$params['location']}%";
        }
        
        if (!empty($params['condition'])) {
            $conditions[] = "p.condition = :condition";
            $queryParams[':condition'] = $params['condition'];
        }

        $whereClause = !empty($conditions) ? "WHERE " . implode(" AND ", $conditions) : "";
        
        // Get total count
        $countSql = "SELECT COUNT(*) as total 
                     FROM products p 
                     JOIN categories c ON p.category_id = c.id 
                     JOIN users u ON p.user_id = u.id 
                     $whereClause";
        
        $total = $this->db->query($countSql, $queryParams)->fetch()['total'];
        
        // Get paginated results
        $offset = ($params['page'] - 1) * $params['per_page'];
        $queryParams[':limit'] = $params['per_page'];
        $queryParams[':offset'] = $offset;
        
        $sql = "SELECT p.*, c.name as category_name, u.name as seller_name, u.location as seller_location 
                FROM products p 
                JOIN categories c ON p.category_id = c.id 
                JOIN users u ON p.user_id = u.id 
                $whereClause 
                ORDER BY p.created_at DESC 
                LIMIT :limit OFFSET :offset";
        
        $items = $this->db->query($sql, $queryParams)->fetchAll();
        
        return [
            'items' => $items,
            'total' => $total
        ];
    }

    public function getSuggestions($query) {
        $sql = "SELECT DISTINCT name 
                FROM products 
                WHERE name LIKE :query 
                LIMIT 5";
        
        $params = [':query' => "%{$query}%"];
        return $this->db->query($sql, $params)->fetchAll(PDO::FETCH_COLUMN);
    }
} 