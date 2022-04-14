import { gql } from "@apollo/client/core"

export const getProducts = gql`
    query GetProducts{
        products {
            code
            name
            desc
            units
            price
        }
    }
`