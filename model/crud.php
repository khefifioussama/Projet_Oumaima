<?php

require_once 'connect.php';
//

class user extends Db
{

    public function add($data,$TableName)
    {
        if (!empty($data)) {
            $f = [];
            $p = [];
            foreach ($data as $fd => $pd) {
                $f[] = $fd;
                $p[] = ":{$fd}";
            }
        }
        $sql = "INSERT INTO {$TableName} (" . implode(',', $f) . ")VALUES(" . implode(',', $p) . ")";
        $stmt = $this->con->prepare($sql);
        try {

            $this->con->beginTransaction();
            $stmt->execute($data);
            $lastId = $this->con->LastInsertId();
            $this->con->commit();
            return $lastId;
        } catch (PDOException $e) {
            echo "error" . $e->getMessage();
            $this->con->rollBack();
        }
    }

    //function add row
    public function getRows($s = 0, $l = 4,$TableName)
    {
        $sql = "SELECT * FROM {$TableName} ORDER BY 
        DESC LIMIT {$s},{$l}";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }
        return $result;
    }

    // function get single row
    public function getRow($f, $value,$TableName)
    {

        $sql = "SELECT * FROM {$TableName} WHERE 
             {$f}=:value";
        $stmt = $this->con->prepare($sql); // Prepare the SQL statement
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }
        return $result;
    }

//get row
    public function getCount($TableName)
    {
        $sql = "SELECT count(*) as c FROM {$TableName}";
        $stmt = $this->con->prepare($sql);// nejmou nekhdmou bl Query   --- seécurité/santaxe
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['c'];
    }


    //fn upload tof (best function for me feha barcha ri9)
    public function upTof($file)
    {
        if (!empty($file)) {
            $fileTempPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileType = $file['type'];
            //bech ya5oulik ba3ed li point
            $fileNameCmps = explode('.', $fileName);
            // png
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $Ext = ["png", "jpg", "jpeg","html"];

            if (in_array($fileExtension, $Ext)) {
                $uploadFileDir = getcwd() . '/PHOTO/';
                $destFilePath = $uploadFileDir . $newFileName;
                if (move_uploaded_file($fileTempPath, $destFilePath)) {

                    return $newFileName;
                }


            }


        }
    }

// fonction update
        public function update($data, $id,$TableName)
    {
        if (!empty($data)) {
            $fields = "";
            $x = 1;
            $fc = count($data);

            foreach ($data as $field => $value) {
                $fields .= "{$field}=:{$field}";
                if ($x < $fc) {
                    $fields .= ",";
                }
                $x++;
            }
        } else {
            return;
        }

        $sql = "UPDATE {$TableName} SET {$fields} WHERE id=:id";// 
        $stmt = $this->con->prepare($sql);
        foreach ($data as $field => $value) {
            $stmt->bindValue(':' . $field, $value);
        }
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }





    public function deleteR($id,$TableName)
    {
        $sql = "DELETE FROM {$TableName} WHERE id = :id";
        $s = $this->con->prepare($sql);
        $s->bindValue(':id', $id, PDO::PARAM_INT);
        $s->execute();
    }












    
}



