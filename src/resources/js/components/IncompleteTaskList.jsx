import React from 'react';

function IncompleteTaskList(props) {
    const {rows, completeTask} = props;
    return (
        <table className="table">
            <tbody>
            {rows.map((row, index) =>
                (<tr key={index}>
                    <td className="text-center">{row.content}</td>
                    <td className="text-center">
                        <button className="btn btn-primary" onClick={() => completeTask(row.id)}>完了</button>
                    </td>
                </tr>))}
            </tbody>
        </table>
    );
}

export default IncompleteTaskList;

