import { gql } from "@apollo/client/core"

export const getUsers = gql`
    query GetUsers{ 
        users {
            code
            user_name
            cpf
            email
        } 
    }
`