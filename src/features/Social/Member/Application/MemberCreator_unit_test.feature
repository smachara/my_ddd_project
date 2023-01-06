Feature: MemberCreator should not throw an exception
  As a developer
  I want to ensure that a MemberCreator does not throw an exception
  So that the program does not crash

Scenario: MemberCreator should create a valid member
    Given  MemberCreator is called with the following valid data:

        | id    | 9f271baa-f35f-42e7-b6ec-e71bf132a8c4 |
        | name  | John Smith |
        | email | john@example.com |
        | password | mysecretpassword 

    When the function executes
    Then it should not throw an exception