import React, { useState } from 'react';
import Filter from './components/Filter';
import ToDoList from './components/ToDoList';
import NewTask from './components/NewTask';
import './App.css';

function App() {
  const [tasks, setTasks] = useState([]);
  const [hideCompleted, setHideCompleted] = useState(false);

  const addTask = (task) => {
    setTasks([...tasks, { text: task, completed: false }]);
  };

  const toggleTaskCompletion = (index) => {
    const newTasks = [...tasks];
    newTasks[index].completed = !newTasks[index].completed;
    setTasks(newTasks);
  };

  const filteredTasks = hideCompleted
    ? tasks.filter((task) => !task.completed)
    : tasks;

  return (
    <div className="app">
      <NewTask addTask={addTask} />
      <Filter hideCompleted={hideCompleted} setHideCompleted={setHideCompleted} />
      <ToDoList tasks={filteredTasks} toggleTaskCompletion={toggleTaskCompletion} />
    </div>
  );
}

export default App;
