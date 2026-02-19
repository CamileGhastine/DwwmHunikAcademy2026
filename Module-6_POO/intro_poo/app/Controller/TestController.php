<?php

require 'Controller.php';
require dirname(__DIR__) . '/Model/Entity/Book.php';
require dirname(__DIR__) . '/Model/Entity/Manga.php';
require dirname(__DIR__) . '/Model/Entity/Rectangle.php';

class TestController extends Controller
{
    private string $viewRepertory = 'exercice/';
    private array $bookExpectedProperties = [
        'title',
        'author',
        'genre',
        'description'
    ];
    private array $bookExpectedMethods = [
        'getTitle',
        'setTitle',
        'getAuthor',
        'setAuthor',
        'getGenre',
        'setGenre',
        'getDescription',
        'setDescription'
    ];

    public function test(): void
    {
        $action = $_GET['page'];
        $errors = $this->$action();

        $this->render($this->viewRepertory . 'exercice' . substr($_GET['page'], 4), compact('errors'));
    }

    private function test1(): array
    {
        $errors = [];

        if (!class_exists('Book')) {
            return ['Vous n\'avez pas créé la classe Book'];
        }

        $bookMethods = get_class_methods('Book');

        $count = 0;


        foreach ($this->bookExpectedMethods as $method) {
            if (!in_array($method, $bookMethods)) {
                $count++;
            }
        }

        if ($count) {
            $errors[] = 'Il manque ' . $count . ' méthode(s) parmi celles attendues.';
        }

        foreach ($this->bookExpectedProperties as $property) {
            if (!property_exists('Book', $property))
                $errors[] = 'l\'attribut "' . $property . '" était attendu.';
        }

        if (count(get_class_vars('Book')) !== 0) {
            $errors[] = 'Problème avec la visibilité des attributs.';
        }

        return $errors;
    }

    private function test2(): array
    {
        require dirname(__DIR__) . '/myCode/objectBook.php';

        $errors = [];

        if (!isset($book) || !($book instanceof Book)) {
            return ['Vous n\'avez pas créé d\'objet $book de la classe Book'];
        }

        foreach ($this->bookExpectedProperties as $property) {
            $getter = 'get' . ucfirst($property);

            if (!$book->$getter()) {
                $errors[] = 'L\'attribut ' . $property . ' n\'a pas été "setté" correctement.';
                echo 'tst';
            }
        }

        return $errors;
    }

    private function test3(): array
    {
        $errors = [];

        require dirname(__DIR__) . '/myCode/objectBook.php';

        $newMethods = [
            '__construct',
            'setDateInstanciation',
            'getDateInstanciation'
        ];

        foreach ($newMethods as $method) {
            if (!method_exists('Book', $method)) {
                $errors[] = 'La méthode ' . $method . ' n\'a pas été ajouté à la classe.';
            }
        }
        if (!property_exists('Book', 'dateInstanciation')) {
            $errors[] = 'l\'attribut "dateInstanciation" était attendu.';
        }
        if ($errors) {
            return $errors;
        }

        $regex = '#[0-9]{2}/[0-9]{2}/[0-9]{4} à [0-9]{2}:[0-9]{2}:[0-9]{2}#';
        if (
            method_exists('Book', '__construct') &&
            !preg_match($regex, $book->getDateInstanciation())
        ) {
            $errors[] = 'Le constructeur n\'opère pas l\'opération demandée correctement.';
        }

        return $errors;
    }

    private function test4(): array
    {
        require dirname(__DIR__) . '/myCode/objectBook.php';
        $errors = [];

        if (!class_exists('Manga')) {
            return ['Vous n\'avez pas créé la classe Manga'];
        }

        if (!is_subclass_of('Manga', 'Book')) {
            return ['Vous n\'avez utilisé l\'héritage'];
        }

        array_push(
            $this->bookExpectedMethods,
            '__construct',
            'setDateInstanciation',
            'getDateInstanciation',
            'setIllustrator',
            'getIllustrator'
        );

        $bookMethods = get_class_methods('Manga');

        if (count($this->bookExpectedMethods) > count($bookMethods)) {
            $errors[] = "Il manque des méthodes à la class Manga";
        } elseif (count($this->bookExpectedMethods) < count($bookMethods)) {
            $errors[] = "La class Manga contient trop de méthode";
        }

        foreach ($bookMethods as $method) {
            if (!in_array($method, $this->bookExpectedMethods)) {
                $errors[] = 'La méthode ' . $method . ' n\'était pas attendue.';
            }
        }

        foreach ($this->bookExpectedMethods as $method) {
            if (!method_exists('Manga', $method)) {
                $errors[] = 'la méthode "' . $method . '" était attendue.';
            }
        }


        if (count(get_class_vars('Manga')) !== 0) {
            $errors[] = 'Problème avec la visibilité des attributs.';
        }

        $this->bookExpectedProperties[] = 'illustrator';

        foreach ($this->bookExpectedProperties as $property) {
            if (!property_exists('Manga', $property))
                $errors[] = 'l\'attribut "' . $property . '" était attendu.';
        }

        if($errors) return $errors;

        if (!isset($manga) || !($manga instanceof Manga)) {
            return ['Vous n\'avez pas créé d\'objet $manga de la classe Book'];
        }

        foreach ($this->bookExpectedProperties as $property) {
            $getter = 'get' . ucfirst($property);

            if (!$manga->$getter()) {
                $errors[] = 'L\'attribut ' . $property . ' n\'a pas été "setté" correctement.';
                echo 'tst';
            }
        }

        return $errors;
    }

    public function test5()
    {
        $errors = [];

        if (!$_POST['length'] || !$_POST['width']) {
            return ['La largeur et la longueur doivent être saisie'];
        }

        if (!class_exists('Rectangle')) {
            return ['La classe Rectangle n\'existe pas !'];
        }

        $rectangleExpectedMethods= ['setLength', 'getLength', 'setWidth', 'getWidth', 'is_square', 'area', '__construct'];
        foreach ($rectangleExpectedMethods as $method) {
            if (!method_exists('Rectangle', $method))
                $errors[] = 'la méthode "' . $method . '" était attendue.';
        }

        foreach (['length', 'width'] as $property) {
            if (!property_exists('Rectangle', $property))
                $errors[] = 'l\'attribut "' . $property . '" était attendu.';
        }

        if ($errors) return $errors;

        require dirname(__DIR__) . '/myCode/objectRectangle.php';

        if (!isset($rectangle) || !($rectangle instanceof Rectangle)) {
            return ['Vous n\'avez pas créé d\'objet $rectangle de la classe Rectangle'];
        }

        if (!$rectangle->getLength() || !$rectangle->getWidth()) {
            return ['L\'objet $rectangle n\'est pas instancié correctement (vérifier l\'instanciation de $rectangle ou le constructeur de la classe Rectangle).'];
        }

        if (!isset($Shakespeare)) return ['Vous n\'avez pas initialisé $Shakespeare'];
        if ($Shakespeare !== 'est' && $Shakespeare !== 'n\'est pas') return ['Vous avez mal initialisé $Shakespeare'];

        if (!isset($area)) return ['Vous n\'avez pas initialisé $area'];
        if ($area !== $rectangle->area()) return ['Vous avez mal initialisé $area'];

        header('Location:index.php?page=ex5&shakespeare=' . $Shakespeare . '&area=' . $area);
    }
}
