<?php

require __DIR__ . '/../vendor/autoload.php'; // Ruta correcta al autoloader

use App\User;
use App\Repositories\InMemoryUserRepository;
use App\Repositories\UserRepositoryInterface;

// Crear una instancia del repositorio de usuarios
$userRepository = new InMemoryUserRepository();

// Crear una instancia del usuario
$user = new User('Sebastian', 'sebastian@example.com', 'password.,');

// Guardar el usuario
$userRepository->save($user);

// Recuperar el usuario y mostrar sus datos
$savedUser = $userRepository->getById(1); // Asumiendo que el primer ID es 1
if ($savedUser) {
    echo "User saved successfully:\n";
    echo "Name: " . $savedUser->getName() . "\n";
    echo "Email: " . $savedUser->getEmail() . "\n";
    echo "Password Hash: " . $savedUser->getPassword() . "\n";
} else {
    echo "User not found.\n";
}
