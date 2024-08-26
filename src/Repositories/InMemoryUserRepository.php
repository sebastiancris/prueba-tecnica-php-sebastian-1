<?php

namespace App\Repositories;

use App\User;

class InMemoryUserRepository implements UserRepositoryInterface {
    private array $users = [];
    private int $nextId = 1;

    public function save(User $user): void {
        $this->users[$this->nextId] = $user;
        $this->nextId++;
    }

    public function update(User $user): void {
        // Supongamos que $user ya tiene un ID asignado
        foreach ($this->users as $id => $existingUser) {
            if ($existingUser === $user) {
                $this->users[$id] = $user;
                break;
            }
        }
    }

    public function delete(User $user): void {
        foreach ($this->users as $id => $existingUser) {
            if ($existingUser === $user) {
                unset($this->users[$id]);
                break;
            }
        }
    }

    public function getById(int $id): ?User {
        return $this->users[$id] ?? null;
    }
}
