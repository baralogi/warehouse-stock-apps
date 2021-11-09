<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService {
    
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getUsers() {
        return $this->userRepository->getAll();   
    }
    
}