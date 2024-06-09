import React from 'react';

function Task({ task, toggleTaskCompletion }) {
  return (
    <li>
      <label style={{ textDecoration: task.completed ? 'line-through' : 'none' }}>
        <input
          type="checkbox"
          checked={task.completed}
          onChange={toggleTaskCompletion}
        />
        {task.text}
      </label>
    </li>
  );
}

export default Task;
