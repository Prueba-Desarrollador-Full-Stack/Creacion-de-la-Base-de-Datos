<?php
  class MovieController extends BaseController
  {
      /** 
  * "/users" Endpoint - Get list of users 
  */
      public function getMoviesAction()
      {
          $strErrorDesc = '';
          $requestMethod = $_SERVER["REQUEST_METHOD"];
          if (strtoupper($requestMethod) == 'GET') {
              try {
                  $movieModel = new MovieModel();
                  $arrMovies = $movieModel->getMovies($_GET['token']);
                  $responseData = json_encode($arrMovies);
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

      public function getMovieAction()
      {
          $strErrorDesc = '';
          $requestMethod = $_SERVER["REQUEST_METHOD"];
          if (strtoupper($requestMethod) == 'GET') {
              try {
                  $movieModel = new MovieModel();
                  $movie = $movieModel->getMovie($_GET['id'], $_GET['token']);
                  $responseData = json_encode($movie);
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
      public function postMovieAction()
      {
          $strErrorDesc = '';
          $requestMethod = $_SERVER["REQUEST_METHOD"];
          if (strtoupper($requestMethod) == 'POST') {
              try {
                  $movieModel = new MovieModel();
                  $movie = $movieModel->postMovie($_GET['name'], $_GET['yearReleased'], $_GET['description'], $_GET['token']);
                  $responseData = json_encode($movie);
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

      public function deleteMovieAction()
      {
          $strErrorDesc = '';
          $requestMethod = $_SERVER["REQUEST_METHOD"];
          if (strtoupper($requestMethod) == 'DELETE') {
              try {
                  $movieModel = new MovieModel();
                  $movie = $movieModel->deleteMovie($_GET['id'], $_GET['token']);
                  $responseData = json_encode($movie);
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