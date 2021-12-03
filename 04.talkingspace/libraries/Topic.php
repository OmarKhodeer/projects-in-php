<?php
class Topic {
  // init DB variable
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllTopics() {
    $this->db->query("SELECT topics.*, users.username, users.avatar, categories.name FROM topics 
                      INNER JOIN users ON topics.user_id = users.id
                      INNER JOIN categories ON topics.category_id = categories.id
                      ORDER BY create_date DESC");
    // Assign result set
    $results = $this->db->resultset();
    return $results;
  }

  // Get All Topics By Category ID
  public function getTopicsByCategory($category_id) {
    $this->db->query("SELECT topics.*, users.username, users.avatar, categories.name FROM topics 
                      INNER JOIN users ON topics.user_id = users.id
                      INNER JOIN categories ON topics.category_id = categories.id
                      WHERE topics.category_id = :category_id");
    $this->db->bind(':category_id', $category_id);
    // Assign result set
    $results = $this->db->resultset();
    return $results;
  }

  // Get total # of topics
  public function getTotalTopics() {
    $this->db->query("SELECT * FROM topics");
    $rows = $this->db->resultset();
    return $this->db->rowCount();
  }

  // Get total # of categories
  public function getTotalCategories() {
    $this->db->query("SELECT * FROM categories");
    $rows = $this->db->resultset();
    return $this->db->rowCount();
  }

  // Get Category By ID
  public function getCategory($category_id) {
    $this->db->query("SELECT * FROM categories WHERE id = :category_id");
    $this->db->bind(':category_id', $category_id);
    // Assign result set
    $row = $this->db->single();
    return $row;
  }

  // Create a Post
  public function create($data) {
    $this->db->query("INSERT INTO topics(category_id, user_id, title, body, last_activity)
                        VALUES(:category_id, :user_id, :title, :body, :last_activity)");
    $this->db->bind(':category_id', $data['category_id']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':body', $data['body']);
    $this->db->bind(':last_activity', $data['last_activity']);
    if($this->db->execute()) {
      return true;
    }else {
      return false;
    }
  }
}