<?php

class BookController
{
    public function index()
    {
        require_once('src/Repository/BookRepository.php');
        $bookRepo = new BookRepository;
        $books = $bookRepo->findAll();  

        require('src/view/index.phtml');
    }

    public function show()
    {
        $id = $_GET['id'];
        require_once('src/Repository/BookRepository.php');
        $bookRepo = new BookRepository;
        $book = $bookRepo->find($id);

        require('src/view/show.phtml');   
    }

    public function search()
    {
        // Récupérer les infos du formulaire
        // COntacter le repository pour récupérer les auteur
        // Afficher la liste des auteur dans une Vue search.phtml
    }
}