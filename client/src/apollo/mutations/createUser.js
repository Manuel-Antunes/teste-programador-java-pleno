import { gql } from "@apollo/client/core"

export const createUser = ({name, email, cpf, phone}) => {
    return {
        mutation: gql`
            mutation {
                createUser(user_name: "${name}", email: "${email}", cpf: "${cpf}", phone_number: "${phone}") {
                    code
                    user_name
                    email
                    cpf
                    phone_number
                }  
            }
        `
    }
}