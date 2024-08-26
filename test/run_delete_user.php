<?php

require __DIR__ . '/../vendor/autoload.php';

use App\User;
use App\Repositories\InMemoryUserRepository;

// Crear una instancia del repositorio de usuarios
$userRepository = new InMemoryUserRepository();

// Crear y guardar un usuario para eliminar
$user = new User('Sebastián Valenzuela', 'sebas@example.com', 'password');
$userRepository->save($user);

// Eliminar el usuario
$user = $userRepository->getById(1); // Asumiendo que el ID del usuario es 1
if ($user) {
    $userRepository->delete($user);
    
    // Intentar recuperar el usuario para verificar que fue eliminado
    $deletedUser = $userRepository->getById(1);
    if (!$deletedUser) {
        echo "User deleted successfully.\n";
    } else {
        echo "User still exists.\n";
    }
} else {
    echo "User not found.\n";
}
