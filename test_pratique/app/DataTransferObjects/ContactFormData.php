<?php

declare(strict_types=1);

namespace App\DataTransferObjects;

class ContactFormData
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $message
    ) {
    }

    public static function fromRequest(): self
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '';
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';

        return new self($name, $email, $message);
    }

    public function isValid(): bool
    {
        return !empty($this->name) 
            && !empty($this->email) 
            && !empty($this->message)
            && filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    public function getErrors(): array
    {
        $errors = [];

        if (empty($this->name)) {
            $errors[] = "Le nom est requis";
        }

        if (empty($this->email)) {
            $errors[] = "L'email est requis";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse email n'est pas valide";
        }

        if (empty($this->message)) {
            $errors[] = "Le message est requis";
        }

        return $errors;
    }
} 