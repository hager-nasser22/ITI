<?php
namespace App\Interfaces;
interface Crud{
    public function create();
    public function read();
    public function update($id);
    public function delete($id);
}