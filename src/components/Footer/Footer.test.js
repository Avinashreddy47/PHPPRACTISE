import { render, screen } from '@testing-library/react';
import Footer from './Footer';

describe("<Footer />", () => {
  it("Renders <Footer /> component correctly", () => {
    const { getByText } = render(<Footer />);
    expect(getByText(/Getting started with React testing library/i)).toBeInTheDocument();
  });
});