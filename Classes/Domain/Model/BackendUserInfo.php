<?php


namespace TRAW\EventDispatch\Domain\Model;


/**
 * Class BackendUserInfo
 * @package TRAW\EventDispatch\Domain\Model
 */
class BackendUserInfo
{
    /**
     * @var string
     */
    protected string $username;
    /**
     * @var int
     */
    protected int $admin;
    /**
     * @var string
     */
    protected string $email;
    /**
     * @var string
     */
    protected string $realName;

    /**
     * BackendUserInfo constructor.
     * @param array $backendUser
     */
    public function __construct(array $backendUser)
    {
        $this->username = $backendUser['username'];
        $this->admin = $backendUser['admin'];
        $this->email = $backendUser['email'];
        $this->realName = $backendUser['realName'];
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return int
     */
    public function getAdmin(): int
    {
        return $this->admin;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getRealName(): string
    {
        return $this->realName;
    }
}