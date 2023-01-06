Feature: Create user
  As an administrator
  I want to be able to create new user accounts from the backoffice
  So that I can give access to the website to new users

Scenario: Successful user creation
  Given I am logged in to the backoffice
  And I am on the "Users" page
  When I click the "Add User" button
  And I enter the following data in the form:
    | name  | John Smith |
    | email | john@example.com |
    | password | mysecretpassword |
  And I select the "Standard" user role
  And I click the "Save" button
  Then I should see a confirmation message saying that the user has been created
  And the new user's name and email should appear in the list of users

Scenario: Email address already in use
  Given I am logged in to the backoffice
  And I am on the "Users" page
  When I click the "Add User" button
  And I enter the following data in the form:
    | name  | John Smith |
    | email | john@example.com |
    | password | mysecretpassword |
  And I select the "Standard" user role
  And I click the "Save" button
  Then I should see an error message saying that the email address is already in use
  And I should remain on the "Add User" page