<?php
class Category {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT c.*, 
                       (SELECT COUNT(*) FROM products WHERE category_id = c.id) as product_count 
                FROM categories c 
                ORDER BY c.name";
        return $this->db->query($sql)->fetchAll();
    }

    public function getWithSubcategories() {
        $sql = "SELECT c.*, 
                       (SELECT COUNT(*) FROM products WHERE category_id = c.id) as product_count,
                       GROUP_CONCAT(sc.id, ':', sc.name) as subcategories
                FROM categories c 
                LEFT JOIN subcategories sc ON c.id = sc.category_id
                GROUP BY c.id
                ORDER BY c.name";
        
        $results = $this->db->query($sql)->fetchAll();
        
        // Process subcategories string into array
        foreach ($results as &$category) {
            if ($category['subcategories']) {
                $subcategories = [];
                $pairs = explode(',', $category['subcategories']);
                foreach ($pairs as $pair) {
                    list($id, $name) = explode(':', $pair);
                    $subcategories[] = [
                        'id' => $id,
                        'name' => $name
                    ];
                }
                $category['subcategories'] = $subcategories;
            } else {
                $category['subcategories'] = [];
            }
        }
        
        return $results;
    }

    public function getById($id) {
        $sql = "SELECT c.*, 
                       (SELECT COUNT(*) FROM products WHERE category_id = c.id) as product_count 
                FROM categories c 
                WHERE c.id = :id";
        
        $params = [':id' => $id];
        return $this->db->query($sql, $params)->fetch();
    }

    public function getSubcategories($categoryId) {
        $sql = "SELECT sc.*, 
                       (SELECT COUNT(*) FROM products WHERE subcategory_id = sc.id) as product_count 
                FROM subcategories sc 
                WHERE sc.category_id = :category_id 
                ORDER BY sc.name";
        
        $params = [':category_id' => $categoryId];
        return $this->db->query($sql, $params)->fetchAll();
    }

    public function create($data) {
        $sql = "INSERT INTO categories (name, description) VALUES (:name, :description)";
        $params = [
            ':name' => $data['name'],
            ':description' => $data['description']
        ];
        return $this->db->query($sql, $params);
    }

    public function update($id, $data) {
        $sql = "UPDATE categories 
                SET name = :name, 
                    description = :description 
                WHERE id = :id";
        
        $params = [
            ':id' => $id,
            ':name' => $data['name'],
            ':description' => $data['description']
        ];
        return $this->db->query($sql, $params);
    }

    public function delete($id) {
        // First check if category has products
        $sql = "SELECT COUNT(*) as count FROM products WHERE category_id = :id";
        $params = [':id' => $id];
        $result = $this->db->query($sql, $params)->fetch();
        
        if ($result['count'] > 0) {
            throw new Exception("Cannot delete category with existing products");
        }
        
        // Delete subcategories first
        $sql = "DELETE FROM subcategories WHERE category_id = :id";
        $this->db->query($sql, $params);
        
        // Then delete category
        $sql = "DELETE FROM categories WHERE id = :id";
        return $this->db->query($sql, $params);
    }
} 