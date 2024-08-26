<?php

require __DIR__ . '/../vendor/autoload.php';

use App\User;
use App\Repositories\InMemoryUserRepository;

// Crear una instancia del repositorio de usuarios
$userRepository = new InMemoryUserRepository();

// Crear y guardar un usuario para actualizar
$user = new User('John Doe', 'john@example.com', 'securepassword');
$userRepository->save($user);

// Actualizar el usuario
$user = $userRepository->getById(1); // Asumiendo que el ID del usuario es 1
if ($user) {
    // Cambiar algunos detalles del usuario
    $user->setName('Jane Doe');
    $user->setEmail('jane@example.com');
    
    // Guardar los cambios
    $userRepository->update($user);
    
    // Mostrar los datos actualizados
    $updatedUser = $userRepository->getById(1);
    echo "User updated successfully:\n";
    echo "Name: " . $updatedUser->getName() . "\n";
    echo "Email: " . $updatedUser->getEmail() . "\n";
    echo "Password Hash: " . $updatedUser->getPassword() . "\n";
} else {
    echo "User not found.\n";
}
