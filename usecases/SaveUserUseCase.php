<?php

class SaveUserUseCase {
    
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function execute(string $name, string $email, string $password): void {
        $user = new User($name, $email, $password);
        $this->userRepository->save($user);
    }
}
