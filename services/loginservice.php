<?php


namespace services;

use PDOException;

/**
 *
 */
class LoginService
{
  public function findIfAdminExists($pdo,$username,$password)
  {
    $sql = "SELECT *
         FROM user
         WHERE login = :username AND motDePasse = :password";

    $request = $pdo->prepare($sql);
    $request->execute(['username' => $username , 'password' => $password]);
    $nbRow = $request->rowcount();
    return $nbRow >= 1;
  }
  private static $defaultUsersService ;

  public static function getDefaultUsersService()
  {
      if (LoginService::$defaultUsersService == null) {
          LoginService::$defaultUsersService = new LoginService();
      }
      return LoginService::$defaultUsersService;
  }
}
