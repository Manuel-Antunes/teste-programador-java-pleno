import { gql } from "@apollo/client/core"

export const updateProduct = ({name, email, cpf, phone}) => {
    return {
        mutation: gql`
            mutation {
                updateProduct(user_name: "${name}", email: "${email}", cpf: "${cpf}", phone_number: "${phone}") {
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