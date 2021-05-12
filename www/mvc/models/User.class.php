<?php

namespace Mvc\Models;
use Core\Model;

/**
 * Class User
 * @package Mvc\Models
 *
 * Modell Produkte mit Session
 *
 */
class User extends Model
{
    protected $user_Id;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->authenticateUser();
    }

    /**
     * Benutzer authentifizieren
     */
    protected function authenticateUser()
    {
        $this->session->checkSession(USER_ID_TAG) ? $this->setUser() : $this->createUser();
    }

    /**
     * @return mixed
     *
     * Benutzer holen
     *
     */
    public function getUser()
    {
        return $this->user_Id;
    }

    /**
     * Benutzer erzeugen
     */
    private function createUser()
    {
        if ( $this->session->createSession(USER_ID_TAG, "user_".time()) )
        {
            $this->setUser();
        }
    }

    /**
     * Benutzer setzen
     */
    private function setUser()
    {
        $this->user_Id =  ($this->session->getSession(USER_ID_TAG)) ? $this->session->getSession(USER_ID_TAG) : NULL;
    }

    /**
     * @return float
     *
     * Benutzerguthaben holen
     *
     */
    public function getUserWalletBalance()
    {
        if (!$this->session->checkUserWalletBalance())
        {
            $this->session->createUserWalletBalance();
        }
        return $this->session->getUserWalletBalance();
    }

    /**
     * @param $newBalance
     * @return bool
     *
     * Benutzerguthaben aktualisieren
     *
     */
    public function updateUserWalletBalance($newBalance)
    {
        return $this->session->updateUserWalletBalance($newBalance);
    }

    /**
     * @param $product_Id
     * @param $user_Rating
     *
     * Benutzer Bewertung aktivität
     *
     */
    public function saveUserRatingActivity($product_Id, $user_Rating)
    {
        $this->session->saveUserRatings($product_Id, $user_Rating);
    }

    /**
     * @return mixed
     *
     * Benutzer Bewertung aktivitäten
     *
     */
    public function getUserRatingActivities()
    {
        if ($this->session->getUserRatings())
        {
            return $this->session->getUserRatings();
        }
    }

}