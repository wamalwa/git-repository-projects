'use strict';

const ACTIONS =
    {
        BI: {name: 'BALANCE ENQUIRY'},
        LOAN_APPLICATION: {name: 'LOAN APPLICATION'}
    };

function validateBI(action) {
    return action === ACTIONS.BI.name;
}

module.exports =
    {
    ACTIONS,
    validateBI
};
