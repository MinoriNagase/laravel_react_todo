import React from 'react';
import {Button, Paper, Table, TableBody, TableCell, TableContainer, TableRow} from '@mui/material';

function IncompleteTaskList(props) {
    const {rows, completeTask} = props;
    return (
        <div className="table">
            <TableContainer component={Paper}>
                <Table>
                    <TableBody>
                        {rows.map((row, index) => (<TableRow key={index}>
                                <TableCell>{row.content}</TableCell>
                                <TableCell>
                                    <Button
                                        variant="contained"
                                        color="secondary"
                                        onClick={() => completeTask(row.id)}>
                                        完了
                                    </Button>
                                </TableCell>
                            </TableRow>))}
                    </TableBody>
                </Table>
            </TableContainer>
        </div>
    );
}

export default IncompleteTaskList;
