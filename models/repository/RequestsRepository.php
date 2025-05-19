<?php
class RequestsRepository extends BaseRepository implements RequestsRepositoryInterface {
    
    public function save(Requests $requests): int {
        $sql = "INSERT INTO requests (request_date, total_value, freight, zip_code, address, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$requests->requestDate, $requests->totalValue, $requests->freight, $requests->zipCode, $requests->address, $requests->status]);

        return (int)$this->pdo->lastInsertId(); 
    }

    public function delete(int $id): void {
        $sql = "DELETE FROM requests WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function copy(Requests $requests): void {
        $sql = "UPDATE request SET request_date = ?, total_value = ?, freight = ?, zip_code = ?, address = ?, status = ?  ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $requests->requestDate, 
            $requests->totalValue,
            $requests->freight,
            $requests->zipCode,
            $requests->address,
            $requests->status
            ]);
        }

    public function findById(int $id): ? Requests {
        $sql = "SELECT * FROM requests WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if(!$data){
            return null;
        }
        return new Requests(
            $data['id'], 
            $data['request_data'], 
            $data['total_value'], 
            $data['freight'], 
            $data['zip_code'],
            $data['address'],
            $data['status']
        );
    }

    public function findAll() : array {
        $sql = 'SELECT * FROM requests';
        $stmt = $this->pdo->prepare($sql);
        $rows = $stmt->fetchAll();

        $requesters = [];
        foreach($rows as $row){
            $requesters[] = new Requests($row['id'], $row['request_data'], $row['total_value'], $row['freight'], 
            $row['zip_code'], $row['address'], $row['status']);
        }
        return $requesters;
    }
}