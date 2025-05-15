<?php
class RequestsRepository extends BaseRepository {
    
    public function save(Requests $requests): void{
        $sql = "INSERT INTO requests (request_date, total_value, freight, zip_code, address, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$requests->request_date, $requests->total_value, $requests->freight, $requests->zip_code, $requests->address, $requests->status]);
    }
}