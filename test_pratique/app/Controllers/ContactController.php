<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Contact;
use App\Exceptions\ContactException;
use App\DataTransferObjects\ContactFormData;
use App\Core\Response;

class ContactController
{
    private readonly Contact $contactModel;

    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function showForm(): void
    {
        require_once __DIR__ . '/../Views/contact/form.php';
    }

    public function submitForm(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formData = ContactFormData::fromRequest();
            if (!$formData->isValid()) {
                $errors = $formData->getErrors();
                require_once __DIR__ . '/../Views/contact/form.php';
                return;
            }

            try {
                if ($this->contactModel->saveMessage(
                    $formData->name,
                    $formData->email,
                    $formData->message
                )) {
                    $success = "Votre message a été envoyé avec succès !";
                } else {
                    throw new ContactException("Erreur lors de la sauvegarde du message");
                }
            } catch (ContactException $e) {
                $error = $e->getMessage();
            } catch (\Exception $e) {
                //$error = "Une erreur inattendue est survenue.";
                $error = $e->getMessage();
                error_log($e->getMessage());
            }

            require_once __DIR__ . '/../Views/contact/form.php';
        }
    }
} 