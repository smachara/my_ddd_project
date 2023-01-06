Feature: Member registration
  As a developer
  I want to be able to register a new member through the API
  So that I can create new accounts for the website

Scenario: Successful member registration
  # Given I have a valid API key
  And I send a "POST" request to "/member/e90fa745-4cc6-4b26-afbb-4c4c0e539029" with body:
    """
    {
      "name": "John Smith",
      "email": "john@example.com",
      "password": "mysecretpassword"
    }
    """
  Then the response status code should be "201"
  And the response should be empty

  # Given I have a valid API key
  # And I make a POST request to the "/members" endpoint with the following data:
  #   | name  | John Smith |
  #   | email | john@example.com |
  #   | password | mysecretpassword |
  # When I send the request
  # And the response body should contain a "success" message
  # And the response body should contain the new member's ID

Scenario: Email address already in use
  # Given I have a valid API key
  And I send a "POST" request to "/member/e90fa745-4cc6-4b26-afbb-4c4c0e539029" with body:
    """
    {
      "name": "John Smith",
      "email": "john@example.com",
      "password": "mysecretpassword"
    }
    """
  Then the response status code should be "400"
  Then the response should contain "error"
  Then the response should contain "email"

  # Given I have a valid API key
  # And I make a POST request to the "/members" endpoint with the following data:
  #   | name  | John Smith |
  #   | email | john@example.com |
  #   | password | mysecretpassword |
  # When I send the request
  # Then the response code should be 400
  # And the response body should contain an "error" message
  # And the response body should contain an "email" field with an error message