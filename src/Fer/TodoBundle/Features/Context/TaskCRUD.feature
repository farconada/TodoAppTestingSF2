Feature: Ser capaz de gestionar la entidad Task
  Crear, borrar, modificar, listar todas las tareas

  Scenario: La URL para gestionar tareas existe
    When I go to "/tareas"
    Then the response status code should be 200
    And the "h2" element should contain "ToDo App"

  Scenario: Hay una URL que devuelve una lista de tareas en JSON
    When I go to "/tareas/lista"
    Then the response status code should be 200
    And the header "Content-Type" should be equal to "application/json"
    And the response should be in JSON
    And the JSON node "root" should have 20 elements

  Scenario: Hay una URL que borra archiva una tarea por su ID
    When I go to "/tarea/1/archiva"
    Then the response status code should be 200
    And the header "Content-Type" should be equal to "application/json"
    And the response should be in JSON
    And the JSON node "msg" should be equal to "OK"
    And the task with id "1" should be archivado "TRUE"