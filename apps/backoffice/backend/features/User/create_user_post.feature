Feature: Create user
  As a backend developer
  I want to be able to create new user accounts through the API
  So that I can give access to the website to new users

Scenario: Successful user creation
  Given I have a valid API key
  And I make a POST request to the "/users" endpoint with the following data:
    | name  | John Smith |
    | email | john@example.com |
    | password | mysecretpassword |
    | role  | standard |
  When I send the request
  Then the response code should be 201
  And the response body should contain a "success" message
  And the response body should contain the new user's ID

Scenario: Email address already in use
  Given I have a valid API key
  And I make a POST request to the "/users" endpoint with the following data:
    | name  | John Smith |
    | email | john@example.com |
    | password | mysecretpassword |
    | role  | standard |
  When I send the request
  Then the response code should be 400
  And the response body should contain an "error" message
  And the response body should contain an "email" field with an error message
