import React from 'react';

function Table(props) {
    const { rows, completeTask } = props;
    return (
        <table className="table">
            {/* タスク表示部分 */}
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

export default Table;

