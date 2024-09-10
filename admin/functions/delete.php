<?php     
session_start();
include("../../conn.php");

if (!isset($_SESSION["user"]) || $_SESSION['usertype'] != 'CAGRO - Administrator') {
    header("location: ../../login.php");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) && isset($_GET['type'])) 
{
    $id = intval($_GET['id']);
    $type = $_GET['type'];

    $conn->begin_transaction();

    try {
        if ($type == 'fisherfolk')
        {
            $sql = "DELETE FROM fisherfolks WHERE ff_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            $conn->commit();
        }
        elseif ($type == 'fishworker') {
    
            $sql = "DELETE FROM locatorinvestor WHERE fw_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();

            $sql = "DELETE FROM fishworkerlicense WHERE fw_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            $conn->commit();
        }
        else if ($type == 'fishinggear')
        {
            $sql = "DELETE FROM fishinggears WHERE fg_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            $conn->commit();
        }
        else if ($type == 'fishingboat')
        {
            $sql = "DELETE FROM fishingboats WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            $conn->commit();
        }
        else if ($type == 'fishcage')
        {
            $sql = "DELETE FROM fishcage WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            $conn->commit();
        }
        
        else {
            throw new Exception('Invalid type');
        }
        

        header("Content-Type: application/json");
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        $conn->rollback();
        header("Content-Type: application/json");
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
    exit();
}
?>