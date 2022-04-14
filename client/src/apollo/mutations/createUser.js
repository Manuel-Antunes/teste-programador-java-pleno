import { gql } from "@apollo/client/core"

export const createUser = gql`
    mutation CreateUser($name: String!, $email: String!, $cpf: String!, $phone: String!) {
        createUser(user_name: $name, email:$email, cpf: $cpf, phone_number: $phone) {
            user_name 
            email
            cpf
            phone_number
        }
    }
`