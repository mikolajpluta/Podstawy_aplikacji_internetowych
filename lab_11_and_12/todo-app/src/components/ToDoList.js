import React from 'react';
import Task from './Task';

function ToDoList({ tasks, toggleTaskCompletion }) {
  if (tasks.length === 0) {
    return <p>No tasks to show</p>;
  }

  return (
    <ul>
      {tasks.map((task, index) => (
        <Task
          key={index}
          task={task}
          toggleTaskCompletion={() => toggleTaskCompletion(index)}
        />
      ))}
    </ul>
  );
}

export default ToDoList;
