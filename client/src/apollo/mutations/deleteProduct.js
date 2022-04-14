import { gql } from "@apollo/client/core"

export const deleteProduct = gql`
    mutation deleteProduct($code: String!){
        deleteProduct(code: $code)
  }  
`