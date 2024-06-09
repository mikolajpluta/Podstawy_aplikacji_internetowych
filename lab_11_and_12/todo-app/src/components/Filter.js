import React from 'react';

function Filter({ hideCompleted, setHideCompleted }) {
  return (
    <div>
      <label>
        <input
          type="checkbox"
          checked={hideCompleted}
          onChange={(e) => setHideCompleted(e.target.checked)}
        />
        Hide completed tasks
      </label>
    </div>
  );
}

export default Filter;
