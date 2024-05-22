<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\usersRepository;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User; // Import the missing User class

class UserController extends AbstractController
{
    // Fetch all users List from the database
    public function userList(UserRepository $userRepository, SerializerInterface $serializer): Response
    {
        $users = $userRepository->findAll();
        $data = $serializer->serialize($users, 'json');
        return new Response($data, 200, ['Content-Type' => 'application/json']);
    }

    // Fetch a single user by ID from the database
    public function findByIdUser(UserRepository $userRepository, int $id, SerializerInterface $serializer): Response
    {
        $users = $userRepository->find($id);
        if (!$users) {
            return new JsonResponse(['error' => 'Page not found'], 404);
        }

        $data = $serializer->serialize($users, 'json');
        return new Response($data, 200, ['Content-Type' => 'application/json']);
    }

    // Create a new user in the database user table
    public function createUser(Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
    {
        $requestData = $request->getContent();
        $users = $serializer->deserialize($requestData, User::class, 'json');

        if (!$users->getName() || !$users->getEmail() || !$users->getPassword()) {
            return new JsonResponse(['error' => 'Missing required fields'], 400);
        }

        $entityManager->persist($users);
        $entityManager->flush();
        $data = $serializer->serialize($users, 'json');
        return new JsonResponse(['message' => 'users Created', 'users' => json_encode($data), 201]);
    }

    // Update a user in the database user table
    public function updateUser(User $user, Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
    {
        $requestData = $request->getContent();
        $updatedUser = $serializer->deserialize($requestData, User::class, 'json');

        $user->setName($updatedUser->getName());
        $user->setEmail($updatedUser->getEmail());
        $user->setPassword($updatedUser->getPassword());

        $entityManager->flush();
        return new Response('Product Update!', 200);
    }

    // Delete a user in the database user table
    public function deleteUser(User $user, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($user);
        $entityManager->flush();
        return new Response('Product Deleted!', 200);
    }
}