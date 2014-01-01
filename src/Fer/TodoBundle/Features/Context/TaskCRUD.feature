Feature: Ser capaz de gestionar la entidad Task
  Crear, borrar, modificar, listar todas las tareas

  Scenario: La URL para gestionar tareas existe
    When I go to "/tareas"
    Then the response status code should be 200