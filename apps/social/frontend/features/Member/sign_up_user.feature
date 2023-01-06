Feature: Sign-up user 
  As a website visitor
  I want to be able to register for an account
  So that I can access restricted areas of the website

Scenario: Successful user registration
  Given I am on the registration page
  When I enter my name, email address, and password
  And I agree to the terms of service and privacy policy
  And I click the "Sign Up" button
  Then I should be redirected to the home page
  And I should see a confirmation message saying that my account has been created

Scenario: Email address already in use
  Given I am on the registration page
  When I enter my name, email address, and password
  And I agree to the terms of service and privacy policy
  And I click the "Sign Up" button
  Then I should see an error message saying that the email address is already in use
  And I should remain on the registration page