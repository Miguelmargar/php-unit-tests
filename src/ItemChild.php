<?php
// Create a child of a class extending the parent class to be able
// to test protected methods by making those protected methods public
// in the child class - does not work with private as private methods
// are not inherited by child classes
class ItemChild extends Item {

    public function getID() {
        return parent::getID();
    }

    public function getToken() {
        return parent::getToken();
    }
}