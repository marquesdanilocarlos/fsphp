<?php


namespace Source\Database\Models;


class UserModel extends Model
{
    private static $entity = "users";
    
    private static $required = ["id", "created_at", "updated_at"];
    
    public function bootstrap()
    {
        
    }

    public function load(int $id)
    {
        
    }

    public function find(string $email)
    {
        
    }

    public function all(int $limit = 30, int $offset = 0)
    {
        
    }

    public function save()
    {
        
    }

    public function destroy()
    {
        
    }

    private function required()
    {
        
    }
}
