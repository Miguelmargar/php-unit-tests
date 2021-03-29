<?php
    // This class is created to be able to test the abstract class
    class Doctor extends AbstractPerson {
        protected function getTitle() {
            return "Dr.";
        }
    }