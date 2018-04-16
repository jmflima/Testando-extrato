<?php
declare(strict_types=1);

namespace SONFin\Autor;
use SONFin\Models\UserInterface;

interface AutorInterface
{
    public function login(array $credenciais): bool;
    
    public function checarLogin(): bool;
    
    public function logout(): void;    
    
    public function hashPassword(string $password): string;
    
    public function user(): ?UserInterface;
}
