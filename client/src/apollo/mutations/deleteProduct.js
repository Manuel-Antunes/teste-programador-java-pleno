import { gql } from "@apollo/client/core";

export const deleteProduct = gql`
  mutation DeleteProduct($code: String!) {
    deleteProduct(code: $code)
  }
`;
