<?php


require_once __DIR__ . '/Database.php';

class Mission
{
    public static function getMissionsByType($type = null)
    {
        $pdo = Database::getConnection();
        if ($type === null) {
            $stmt = $pdo->query("SELECT * FROM missions ORDER BY id DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $sql = "SELECT * FROM missions WHERE mission_type = :type ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':type' => $type]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getMissionById($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM missions WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}
