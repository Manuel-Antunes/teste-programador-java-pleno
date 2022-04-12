import { gql } from "@apollo/client/core"

export const getUsers = () => {
    return {
        query: gql`
            query {
                 users {
                     code
                     user_name
                     cpf
                     email
                 } 
            }
        `
    }
}