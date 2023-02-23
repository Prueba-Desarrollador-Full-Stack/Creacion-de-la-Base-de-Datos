<?php
  class UserController extends BaseController
  {
      /** 
  * "/users" Endpoint - Get list of users 
  */
      public function getUsersAction()
      {
          $strErrorDesc = '';
          $requestMethod = $_SERVER["REQUEST_METHOD"];
          if (strtoupper($requestMethod) == 'GET') {
              try {
                  $userModel = new UserModel();
                  $arrUsers = $userModel->getUsers();
                  $responseData = json_encode($arrUsers);
              } catch (Error $e) {
                  $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                  $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
              }
          } else {
              $strErrorDesc = 'Method not supported';
              $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
          }
          // send output 
          if (!$strErrorDesc) {
              $this->sendOutput(
                  $responseData,
                  array('Content-Type: application/json', 'HTTP/1.1 200 OK')
              );
          } else {
              $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                  array('Content-Type: application/json', $strErrorHeader)
              );
          }
      }

      public function getUserAction()
      {
          $strErrorDesc = '';
          $requestMethod = $_SERVER["REQUEST_METHOD"];
          if (strtoupper($requestMethod) == 'GET') {
              try {
                  $userModel = new UserModel();
                  $user = $userModel->getUser($_GET['id']);
                  $responseData = json_encode($user);
              } catch (Error $e) {
                  $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                  $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
              }
          } else {
              $strErrorDesc = 'Method not supported';
              $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
          }
          // send output 
          if (!$strErrorDesc) {
              $this->sendOutput(
                  $responseData,
                  array('Content-Type: application/json', 'HTTP/1.1 200 OK')
              );
          } else {
              $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                  array('Content-Type: application/json', $strErrorHeader)
              );
          }
      }
      public function postUserAction()
      {
          $strErrorDesc = '';
          $requestMethod = $_SERVER["REQUEST_METHOD"];
          if (strtoupper($requestMethod) == 'POST') {
              try {
                  $userModel = new UserModel();
                  $user = $userModel->postUser($_GET['user'], $_GET['password']);
                  $responseData = json_encode($user);
              } catch (Error $e) {
                  $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                  $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
              }
          } else {
              $strErrorDesc = 'Method not supported';
              $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
          }
          // send output 
          if (!$strErrorDesc) {
              $this->sendOutput(
                  $responseData,
                  array('Content-Type: application/json', 'HTTP/1.1 200 OK')
              );
          } else {
              $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                  array('Content-Type: application/json', $strErrorHeader)
              );
          }
      }

      public function deleteUserAction()
      {
          $strErrorDesc = '';
          $requestMethod = $_SERVER["REQUEST_METHOD"];
          if (strtoupper($requestMethod) == 'DELETE') {
              try {
                  $userModel = new UserModel();
                  $user = $userModel->deleteUser($_GET['id']);
                  $responseData = json_encode($user);
              } catch (Error $e) {
                  $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                  $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
              }
          } else {
              $strErrorDesc = 'Method not supported';
              $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
          }
          // send output 
          if (!$strErrorDesc) {
              $this->sendOutput(
                  $responseData,
                  array('Content-Type: application/json', 'HTTP/1.1 200 OK')
              );
          } else {
              $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                  array('Content-Type: application/json', $strErrorHeader)
              );
          }
      }

      public function putUserAction()
      {
          $strErrorDesc = '';
          $requestMethod = $_SERVER["REQUEST_METHOD"];
          if (strtoupper($requestMethod) == 'PUT') {
              try {
                  $userModel = new UserModel();
                  $user = $userModel->updateUser($_GET['id'], $_GET['user'], $_GET['password']);
                  $responseData = json_encode($user);
              } catch (Error $e) {
                  $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                  $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
              }
          } else {
              $strErrorDesc = 'Method not supported';
              $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
          }
          // send output 
          if (!$strErrorDesc) {
              $this->sendOutput(
                  $responseData,
                  array('Content-Type: application/json', 'HTTP/1.1 200 OK')
              );
          } else {
              $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                  array('Content-Type: application/json', $strErrorHeader)
              );
          }
      }

      public function loginUserAction()
      {
          $strErrorDesc = '';
          $requestMethod = $_SERVER["REQUEST_METHOD"];
          if (strtoupper($requestMethod) == 'POST') {
              try {
                  $userModel = new UserModel();
                  $user = $userModel->login($_GET['user'], $_GET['password']);
                  $responseData = json_encode($user);
              } catch (Error $e) {
                  $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                  $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
              }
          } else {
              $strErrorDesc = 'Method not supported';
              $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
          }
          // send output 
          if (!$strErrorDesc) {
              $this->sendOutput(
                  $responseData,
                  array('Content-Type: application/json', 'HTTP/1.1 200 OK')
              );
          } else {
              $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                  array('Content-Type: application/json', $strErrorHeader)
              );
          }
      }
  }
?>